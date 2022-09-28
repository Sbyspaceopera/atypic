import { registerBlockType } from "@wordpress/blocks";
import "./index.scss";
import Edit from "./edit";
import save from "./save";

registerBlockType("atypic/gallery", {
  apiVersion: 2,
  edit: Edit,
});
