import {
  RichText,
  useBlockProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";
import { PanelBody, RadioControl } from "@wordpress/components";
import { getIconComponent } from "./icons-map";

const Edit = ({ className, attributes, setAttributes }) => {
  const { content, option } = attributes;

  const blockProps = useBlockProps();

  const HeadingIcon = getIconComponent(option);

  return (
    <div className="aquila-icon-heading">
      <span className="aquila-icon-heading__heading">
        <HeadingIcon />
      </span>
      <RichText
        {...blockProps}
        tagName="h4" // The tag here is the element output and editable in the admin
        value={attributes.content} // Any existing content, either from the database or an attribute default
        className={className}
        allowedFormats={["core/bold", "core/italic"]} // Allow the content to be made bold or italic, but do not allow other formatting options
        onChange={(content) => setAttributes({ content })} // Store updated content as a block attribute
        placeholder={__("Heading...", "aquila")} // Display this text before any content has been added by the user
      />
      <InspectorControls>
        <PanelBody title={__("Block Settings", "aquila")}>
          <RadioControl
            label={__("Select Icon", "aquila")}
            help={__("Control The Icon Selection", "aquila")}
            selected={option}
            options={[
              { label: __("Dos", "aquila"), value: "dos" },
              { label: __("Dont", "aquila"), value: "donts" },
            ]}
            onChange={(option) => setAttributes({ option })}
          />
        </PanelBody>
      </InspectorControls>
    </div>
  );
};

export default Edit;
