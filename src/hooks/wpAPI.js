import {useState} from '@wordpress/element'
import { apiFetch } from '@wordpress/api-fetch';

/**
 * Query the WordPress REST API or custom routes.
 * @param {*} props 
 */
function useWordPressAPI({params, fields}){
    const [response, setResponse] = useEffect();
    
    const rootURL = location.href + location.hostname + "/wp-json/wp/v2/";
    apiFetch.use(apiFetch.createRootURLMiddleware(rootURL));

    useEffect(() =>{

    }, [])





    return {getTitle}
}