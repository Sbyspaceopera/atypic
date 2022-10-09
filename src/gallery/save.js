import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { useEffect, useState } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import Gallery from "./components/gallery";

import "../../scss/header.scss";
import "../../style.css";

export default function Save({ attributes }) {
  const blockProps = useBlockProps.save();
  const { collectionID } = attributes;

  return (
    <div {...blockProps}>
      <atypic-gallery collectionid={collectionID} />
    </div>
  );
}
