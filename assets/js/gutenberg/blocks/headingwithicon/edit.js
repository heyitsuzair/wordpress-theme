import { RichText, useBlockProps } from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";

const Edit = ({ className, attributes, setAttributes }) => {
  const { content } = attributes;

  const blockProps = useBlockProps();

  return (
    <div className="aquila-icon-heading">
      <span className="aquila-icon-heading__heading"></span>
      <RichText
        {...blockProps}
        tagName="h4" // The tag here is the element output and editable in the admin
        value={attributes.content} // Any existing content, either from the database or an attribute default
        className={className}
        allowedFormats={["core/bold", "core/italic"]} // Allow the content to be made bold or italic, but do not allow other formatting options
        onChange={(content) => setAttributes({ content })} // Store updated content as a block attribute
        placeholder={__("Heading...", "aquila")} // Display this text before any content has been added by the user
      />
    </div>
  );
};

export default Edit;
