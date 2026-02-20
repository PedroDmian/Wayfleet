/* global module */
module.exports = {
  extends: ['@commitlint/config-conventional'],
  plugins: ['commitlint-plugin-function-rules'],
  rules: {
    'header-max-length': [0],
    'type-empty': [0],
    'subject-empty': [0],
    'type-enum': [0],
    'function-rules/type-enum': [
      2,
      'always',
      (parsed) => {
        const headerRegex =
          /^(((feat|fix|perf|chore|ci|docs|refactor|revert|style|test|build)): (.+){10,})$/;
        const isHeaderValid = parsed.header.match(headerRegex);
        if (isHeaderValid) {
          return [true];
        }
        return [
          false,
          'Commit description is not valid, eg a correct commit: feat: change variable name on file hello.ts',
        ];
      },
    ],
  },
};
