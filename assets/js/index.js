import register from "preact-custom-element";
import Gallery from "./web-components/gallery";
import Gallery3D from "./web-components/gallery-3d";

register(Gallery, "atypic-gallery", ["collectionid"], { shadow: false });
register(Gallery3D, "atypic-gallery-3d", ["collectionid"], { shadow: false });
