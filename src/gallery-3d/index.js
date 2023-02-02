import { registerBlockType } from "@wordpress/blocks";
import "./index.scss";
import Edit from "./edit";
import Save from "./save";

registerBlockType("atypic/gallery-3d", {
  apiVersion: 2,
  edit: Edit,
  save: Save,
});
