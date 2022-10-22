/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { InnerBlocks, RichText, useBlockProps } from "@wordpress/block-editor";
import Edit from "./edit";

// Register the block
registerBlockType("aquila-blocks/dos-and-donts", {
  title: __("Dos And Donts", "aquila"),
  icon: "editor-table",
  category: "aquila",
  description: __("Add Heading And Text", "aquila"),
  edit: Edit,
  save: function ({ attributes }) {
    const blockProps = useBlockProps.save();
    return (
      <div className="aquila-dos-and-donts">
        <InnerBlocks.Content />
      </div>
    ); // Saves <h2>Content added in the editor...</h2> to the database for frontend display;
  },
});
