/**
 * Register Block Styles
 */

import { registerBlockStyle } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";

const layoutStyleButton = [
  {
    name: "layout-border-blue-fill",
    label: __("Blue Outline", "aquila"),
  },
  {
    name: "layout-border-white-no-fill",
    label: __("White Outline - Used With Dark Background", "aquila"),
  },
];

const register = () => {
  layoutStyleButton.forEach((layoutStyle) => {
    registerBlockStyle("core/button", layoutStyle);
  });
};

wp.domReady(() => register());
