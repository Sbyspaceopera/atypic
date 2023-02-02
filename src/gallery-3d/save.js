import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

import "../../assets/scss/header.scss";
import "../../style.css";

export default function Save({ attributes }) {
  const blockProps = useBlockProps.save();
  const { collectionID } = attributes;

  return (
    <div {...blockProps}>
      <atypic-gallery-3d collectionid={collectionID} />
    </div>
  );
}
