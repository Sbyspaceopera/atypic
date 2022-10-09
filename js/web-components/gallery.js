import { h, createRef, Fragment } from "preact";
import { useEffect, useState, useRef } from "preact/hooks";
import apiFetch from "@wordpress/api-fetch";
import { Spinner } from "@wordpress/components";

const Gallery = ({ collectionid }) => {
  const [collection, setCollection] = useState(null);
  const [selectedImage, setSelectedImage] = useState(null);
  const [previewImageFormat, setPreviewImageFormat] = useState("");
  const [imagesRef, setImagesRef] = useState([]);
  const [showDescription, setShowDescription] = useState(false);
  const [isFullscreen, setIsFullscreen] = useState(false);
  const previewImageRef = useRef();
  const galleryRef = useRef();

  useEffect(() => {
    if (collectionid) {
      apiFetch({ path: `/wp-json/wp/v2/atypic_gallery/${collectionid}` })
        .then((data) => setCollection({ ...data }))
        .catch((err) => console.log(err));
    }
  }, [collectionid]);

  useEffect(() => {
    if (collection) {
      setSelectedImage({ ...collection.cmb2.gallery.images[0] });
      setImagesRef((imagesRef) =>
        Array(collection.cmb2.gallery.images.length)
          .fill()
          .map((_, i) => imagesRef[i] || createRef())
      );
    }
  }, [collection]);

  const handleFullscreen = (target) => {
    if (document.fullscreenElement || ShadowRoot.fullscreenElement) {
      document.exitFullscreen();
    } else {
      target.requestFullscreen();
    }
    setIsFullscreen(!isFullscreen);
  };

  return collection ? (
    <div
      className={`bg-black sm:rounded-md md:max-w-[750px] relative my-4 mx-auto ${isFullscreen ? "h-full" : ""}`}
      ref={galleryRef}>
      {selectedImage ? (
        <Fragment>
          
          {/* Header */}
          <div className={isFullscreen ? "h-[12vh]" : ""}>
            <h3 className="text-center p-2 my-0 text-yellow-500 text-2xl font-semibold sm:rounded-t-lg">
              {collection.title.rendered}
              <span
                onClick={() => setShowDescription(!showDescription)}
                className="dashicons dashicons-info-outline hover:cursor-pointer text-2xl text-yellow-500 text-center mx-2"></span>
            </h3>
            <span
              onClick={(e) => handleFullscreen(galleryRef.current)}
              className={
                "dashicons text-right text-3xl " +
                (isFullscreen
                  ? "dashicons-fullscreen-exit-alt"
                  : "dashicons-fullscreen-alt") +
                " text-white absolute top-2 right-4 hover:cursor-pointer"
              }></span>

            {showDescription && (
              <p className="text-yellow-500 text-center m-0 font-semibold italic p-1">
                {selectedImage.description}
              </p>
            )}
          </div>

          {/* Selected image */}
          <div className={`${isFullscreen ? "h-[60vh]" : "h-[400px]"} w-full flex items-center justify-center`}>
            <img
              ref={previewImageRef}
              key={selectedImage.url}
              className={previewImageFormat + " hover:cursor-pointer"}
              onLoad={() =>
                setPreviewImageFormat(
                  previewImageRef.current.width > previewImageRef.current.height
                    ? "w-[100%] max-w-md sm:max-w-xl block"
                    : `${isFullscreen ? "h-[60vh]" : "max-h-[400px]"} max-w-[100%] block`
                )
              }
              onClick={(e) => handleFullscreen(e.target)}
              src={selectedImage.url}
              alt={selectedImage.description}
            />
          </div>
        </Fragment>
      ) : null}

      {/* Selected Image Meta */}
      <div className={isFullscreen ? "h-[11vh]" : ""}>
        <h4 className="text-center p-1  my-0 text-white text-lg font-semibold">
          {selectedImage ? selectedImage.title : null}
        </h4>
        <p className="text-center p-1 italic my-0 text-white">
          "{selectedImage ? selectedImage.description : null}"
        </p>
      </div>

      {/* Slider */}
      <div className={`${isFullscreen ? "h-[17vh]" : ""} flex gap-2 border-8 border-solid p-3 bg-white/25 py-2 atypic-scroll-x scroll-smooth rounded-[1rem]`}>
        {Object.values(collection.cmb2.gallery.images).map((image, index) => (
          <img
            ref={imagesRef[index]}
            id={image.url_id}
            key={image.url}
            className={`${isFullscreen ? "h-full" : "h-[100px]"} hover:cursor-pointer rounded-md ${
              selectedImage && image.url_id === selectedImage.url_id
                ? "border-solid border-4 border-yellow-500"
                : ""
            }`}
            src={image.url}
            alt={image.description}
            onClick={() => {
              setSelectedImage({ ...image });
              setPreviewImageFormat(
                imagesRef[index].current.width > imagesRef[index].current.height
                  ? "w-[100%] max-w-md sm:max-w-xl block"
                  : `${isFullscreen ? "h-full" : "max-h-[400px]"} max-w-[100%] block`
              );
            }}
          />
        ))}
      </div>
    </div>
  ) : (
    <div className="mx-auto child:mx-auto child:block">
      <Spinner />
    </div>
  );
};

export default Gallery;
