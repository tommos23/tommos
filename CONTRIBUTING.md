# Contributing to tommos.co.uk

Thank you for your interest in contributing to this blog! While this is primarily a personal blog, contributions are welcome for:

## Types of Contributions

### Bug Reports
- Broken links
- Typos or formatting issues
- Build or deployment problems
- Accessibility issues

### Suggestions
- Content improvements
- Technical enhancements
- SEO optimizations
- Performance improvements

## How to Contribute

### Reporting Issues
1. Check if the issue already exists in the [issue tracker](https://github.com/tommos23/tommos/issues)
2. Create a new issue with:
   - Clear description of the problem
   - Steps to reproduce (if applicable)
   - Expected vs actual behavior
   - Screenshots (if relevant)

### Submitting Changes
1. Fork the repository
2. Create a new branch (`git checkout -b feature/improvement`)
3. Make your changes following the project guidelines
4. Test your changes locally:
   ```bash
   hugo server -D
   ```
5. Commit your changes with a clear message
6. Push to your fork
7. Create a Pull Request

## Development Guidelines

### Code Style
- Follow existing formatting in configuration files
- Use Hugo best practices
- Keep configuration changes minimal and well-documented

### Content Guidelines
- Blog posts go in `content/posts/`
- Use Markdown format with proper front matter
- Include appropriate tags and categories
- Test locally before submitting

### Testing
Before submitting a PR, ensure:
- [ ] Site builds without errors: `hugo --minify`
- [ ] Development server works: `hugo server -D`
- [ ] No broken links (check with link checker)
- [ ] Changes don't break existing functionality

## Questions?

Feel free to open an issue for discussion or reach out via [GitHub](https://github.com/tommos23).

## License

By contributing, you agree that your contributions will be licensed under the same license as the project (MIT License for code, © tommos.co.uk for content).
