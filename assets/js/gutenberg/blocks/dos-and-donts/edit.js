import { InnerBlocks } from "@wordpress/block-editor";
import { blockColumns } from "./templates";
const Edit = () => {
  const ALLOWED_BLOCKS = ["core/group"];

  const INNER_BLOCK_TEMPLATE = [
    [
      "core/group",
      {
        className: "aquila-dos-and-donts__group",
        backgroundColor: "cyan-bluish-gray",
      },
      blockColumns,
    ],
  ];

  return (
    <div className="aquila-dos-and-donts">
      <InnerBlocks
        allowedBlocks={ALLOWED_BLOCKS}
        templateLock={true}
        template={INNER_BLOCK_TEMPLATE}
      />
    </div>
  );
};

export default Edit;
