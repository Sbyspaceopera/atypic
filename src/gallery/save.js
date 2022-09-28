import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { useEffect, useState } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";

export default function save({ attributes }) {
  const { title, selectedCollection } = attributes;
  const { collection, setCollection } = useState();

  useEffect(() => {
    apiFetch({ path: `/wp/v2/atypic_gallery/${selectedCollection}` }).then(
      (data) => setCollection({ data })
    );
  }, []);

  return (
    <div {...useBlockProps()}>
      <h3>{title}</h3>
    </div>
  );
}
