const getBlockColumn = (optionVal, colClassName, headings) => {
  return [
    "core/column",
    { className: colClassName },
    [
      [
        "aquila-blocks/heading",
        {
          className: "aquila-dos-and-donts-heading",
          option: optionVal,
          content: headings,
        },
      ],
      [
        "core/list",
        {
          className: "aquila-dos-and-donts__list",
        },
      ],
    ],
  ];
};

export const blockColumns = [
  [
    "core/columns",
    {
      className: "aquila-dos-and-donts__cols",
    },
    [
      getBlockColumn("dos", "aquila-dos-and-donts__col-one", "Dos"),
      getBlockColumn("donts", "aquila-dos-and-donts__col-one", "Donts"),
    ],
  ],
];
