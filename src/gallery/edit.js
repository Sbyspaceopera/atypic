import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { Fragment, useEffect, useState, useRef } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import { SelectControl, Spinner } from "@wordpress/components";

import "../../assets/scss/header.scss";
import "../../style.css";

export default function Edit({ attributes, setAttributes }) {
  const { collectionID } = attributes;
  const [collections, setCollections] = useState([]);
  const [selectedCollection, setSelectedCollection] = useState(null);
  const [preview, setPreview] = useState(false);
  const blockProps = useBlockProps({
    className: "bg-white sm:p-3 lg:px-20 border-solid border-x-0 border-y-4",
  });

  //Todo : make a custom rest api routes to query only titles and ids from collections
  useEffect(() => {
    apiFetch({ path: "/wp/v2/atypic_gallery" })
      .then((data) => setCollections([...collections, ...data]))
      .catch((err) => console.log(err));
  }, []);

  useEffect(() => {
    if (collections.length) {
      const collection = collections.find(
        (collection) => collection.id === collectionID
      );
      setSelectedCollection(collection);
    }
  }, [collectionID, collections]);

  const onChange = (value) => {
    setAttributes({
      collectionID: parseInt(value, 10),
    });
  };

  const renderOptionHTML = () => {
    return (
      <Fragment>
        {!selectedCollection ? (
          <option>--{__("Select a collection to show")}--</option>
        ) : null}

        {collections.map((collection) => (
          <option key={collection.id} value={collection.id}>
            {collection.title.rendered}
          </option>
        ))}
      </Fragment>
    );
  };

  const renderForm = () => {
    return (
      <Fragment>
        <SelectControl
          value={collectionID}
          label={
            <div className="my-0 font-semibold underline decoration-yellow-500 decoration-4 text-lg font-semibold">
              {__("Choose A Collection :")}
            </div>
          }
          onChange={(value) => onChange(value)}>
          {renderOptionHTML()}
        </SelectControl>

        {collectionID && (
          <div className="flex items-center justify-center">
            <div
              className=" text-center ring-4 my-2 rounded-lg w-[200px] ring-yellow-500 ring-offset-3 border-4 border-solid border-black bg-white text-black font-semibold my-0 p-2 hover:cursor-pointer"
              onClick={() => setPreview(!preview)}>
              {preview ? __("Hide Preview") : __("Show Preview")}
            </div>
          </div>
        )}
        {preview && collectionID && (
          <atypic-gallery collectionID={collectionID} />
        )}
      </Fragment>
    );
  };

  return (
    <div {...blockProps}>{collections.length ? renderForm() : <Spinner />}</div>
  );
}
