import Greeting from './web-components/test.jsx'
import register from 'preact-custom-element';

register(Greeting, 'x-greeting', ['name'], { shadow: false })