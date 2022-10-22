/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { RichText, useBlockProps } from "@wordpress/block-editor";
import Edit from "./edit";
import { getIconComponent } from "./icons-map";

// Register the block
registerBlockType("aquila-blocks/heading", {
  title: __("Heading With Icon", "aquila"),
  icon: "admin-customizer",
  category: "aquila",
  description: __("Add Heading And Select Icon", "aquila"),
  attributes: {
    option: {
      type: "string",
      default: "Dos",
    },
    content: {
      type: "string",
      source: "html",
      selector: "h4",
      default: __("Dos", "aquila"),
    },
  },
  edit: Edit,
  save: function ({ attributes }) {
    const blockProps = useBlockProps.save();
    const HeadingIcon = getIconComponent(attributes.option);
    return (
      <div className="aquila-icon-heading">
        <span className="aquila-icon-heading__heading">
          <HeadingIcon />
        </span>
        <RichText.Content
          {...blockProps}
          tagName="h4"
          value={attributes.content}
        />
      </div>
    ); // Saves <h2>Content added in the editor...</h2> to the database for frontend display;
  },
});
