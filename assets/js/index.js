import register from 'preact-custom-element';
import Gallery from './web-components/gallery';

register(Gallery, 'atypic-gallery', ['collectionid'], { shadow: false });
