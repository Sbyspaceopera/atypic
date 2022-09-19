import {h} from 'preact'

const Greeting = ({ name = 'World' }) => (
  <p>Hello, {name}!</p>
);

export default Greeting;