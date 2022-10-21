/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
// Register the block
registerBlockType("aquila-blocks/heading", {
  title: __("Heading With Icon", "aquila"),
  icon: "admin-customizer",
  category: "aquila",
  description: __("Add Heading And Select Icon", "aquila"),
  edit: function () {
    return <p> Hello world (from the editor)</p>;
  },
  save: function () {
    return <p> Hola mundo (from the frontend) </p>;
  },
});
