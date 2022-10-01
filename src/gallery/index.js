import { registerBlockType } from "@wordpress/blocks";
import "./index.scss";
import Edit from "./Edit";
import Save from "./Save";

registerBlockType("atypic/gallery", {
  apiVersion: 2,
  edit: Edit,
  save : Save
});
