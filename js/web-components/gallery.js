import {h,  createRef, Fragment } from 'preact';
import {useEffect, useState, useRef,} from 'preact/hooks';
import apiFetch from '@wordpress/api-fetch';
import { Spinner } from '@wordpress/components';

const Gallery = ({ collectionid }) => {
  const [collection, setCollection] = useState(null)
  const [selectedImage, setSelectedImage] = useState(null);
  const [previewImageFormat, setPreviewImageFormat] = useState("");
  const [imagesRef, setImagesRef] = useState([]);
  const [showDescription, setShowDescription] = useState(false);
  const previewImageRef = useRef();
  const galleryRef = useRef();

  useEffect(() => {
    if(collectionid){
      apiFetch({ path: `/wp-json/wp/v2/atypic_gallery/${collectionid}` }).then(
        (data) => 
          setCollection({ ...data })
        
      ).catch((err) =>console.log(err));
    }
  }, [collectionid]);

  useEffect(() => {
    if (collection) {
      console.log(collection)
      setSelectedImage({ ...collection.cmb2.gallery.images[0] });
      setImagesRef((imagesRef) =>
        Array(collection.cmb2.gallery.images.length)
          .fill()
          .map((_, i) => imagesRef[i] || createRef())
      );
    }
  }, [collection]);

  const handleClick = (e) => {
    if(document.fullscreenElement || ShadowRoot.fullscreenElement){
      document.exitFullscreen();
    }else{
      e.target.requestFullscreen();
    }
  }

  return ( collection ?
      <div className="bg-black sm:rounded-lg lg:w-[80%] relative my-2" ref={galleryRef}>
        {selectedImage ? (
        <Fragment>
            <h3 className="text-center p-2 my-0 text-yellow-500 text-2xl font-semibold sm:rounded-t-lg">
              {collection.title.rendered}
              <span onClick={() => setShowDescription(!showDescription)} className="dashicons dashicons-info-outline hover:cursor-pointer text-2xl text-yellow-500 text-center mx-2"></span>
            </h3>
            {showDescription &&
              <p className="text-yellow-500 text-center m-0 font-semibold italic p-1">{selectedImage.description}</p>
            }
            <div className="h-[450px] w-full flex items-center justify-center">
                <img
                ref={previewImageRef}
                key={selectedImage.url}
                className={previewImageFormat + " hover:cursor-pointer"}
                onLoad={() =>setPreviewImageFormat(
                    previewImageRef.current.width >
                    previewImageRef.current.height
                    ? "w-[100%] max-w-md sm:max-w-xl block"
                    : "h-[450px] block"
                )}
                onClick={e => handleClick(e)}
                src={selectedImage.url}
                alt={selectedImage.description}
                />
            </div>
            <h4 className="text-center p-1  my-0 text-white text-lg font-semibold">{selectedImage.title}</h4>
            <p className="text-center p-1 italic my-0 text-white">"{selectedImage.description}"</p>
        </Fragment>
        ) : null}
        
        {/* Slider */}
        <div className="flex gap-2 border-8 border-solid p-3 bg-white/25 py-2 atypic-scroll-x scroll-smooth rounded-[1rem]">
          {Object.values(collection.cmb2.gallery.images).map((image, index) => (
                <img
                  ref={imagesRef[index]}
                  id={image.url_id}
                  key={image.url}
                  className={`h-[100px] hover:cursor-pointer rounded-md ${
                    selectedImage && image.url_id === selectedImage.url_id
                      ? "border-solid border-4 border-yellow-500"
                      : ""
                  }`}
                  src={image.url}
                  alt={image.description}
                  onClick={() => {
                    setSelectedImage({ ...image });
                    setPreviewImageFormat(
                      imagesRef[index].current.width >
                        imagesRef[index].current.height
                        ? "w-[100%] max-w-md sm:max-w-xl block"
                        : "h-[450px]"
                    );
                  }}
                />
          ))}
        </div>
      </div>
      : <Spinner />
  );
};

export default Gallery;
