import {useState} from '@wordpress/element'
import { apiFetch } from '@wordpress/api-fetch';

/**
 * Query the WordPress REST API or custom routes.
 * @param {*} props 
 */
function wpAPI({ body,method ="GET",apiSlugAndVersion = "wp/v2" }){
    const rootURL = location.href + location.hostname + "/wp-json/wp/v2";
    apiFetch.use(apiFetch.createRootURLMiddleware(rootURL));

    



    return {getTitle}
}