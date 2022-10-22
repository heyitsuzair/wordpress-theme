/**
 * Register Block Styles
 */

import { registerBlockStyle, unregisterBlockStyle } from "@wordpress/blocks";
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

const unRegister = () => {
  unregisterBlockStyle("core/button", "outline");
};

const register = () => {
  layoutStyleButton.forEach((layoutStyle) => {
    registerBlockStyle("core/button", layoutStyle);
  });
};

wp.domReady(() => {
  register();
  unRegister();
});
