# GitHub Copilot Instructions for tommos.co.uk

## Project Overview
This is a personal blog built with Hugo, a fast and modern static site generator. The site is deployed on Cloudflare Pages and features blog posts about technology, coding, and development.

## Project Structure
```
tommos/
├── archetypes/       # Content templates for new posts
├── content/          # Blog content (Markdown files)
│   ├── _index.md    # Homepage content
│   └── posts/       # Blog posts directory
├── static/          # Static assets (favicons, images, CSS, JS)
├── themes/          # Hugo themes (PaperMod theme as git submodule)
├── legacy/          # Legacy static site files (for reference)
├── hugo.toml        # Hugo site configuration
├── .gitignore       # Git ignore patterns
├── .gitmodules      # Git submodules configuration
└── README.md        # Project documentation
```

## Technologies Used
- **Hugo** (v0.146.0 or later) - Static site generator
- **PaperMod Theme** - Hugo theme with dark mode support
- **Markdown** - Content format
- **TOML** - Configuration format
- **Git submodules** - For theme management
- **Cloudflare Pages** - Deployment platform

## Hugo Commands
- `hugo server -D` - Start development server with drafts
- `hugo new posts/post-name.md` - Create new blog post
- `hugo --minify` - Build for production
- `git submodule update --init --recursive` - Initialize theme submodules

## Code Style Guidelines
- Use Markdown for all content files
- Follow Hugo's front matter format (YAML or TOML)
- Keep indentation consistent (2 spaces for YAML/TOML)
- Use meaningful file names in kebab-case (e.g., `my-blog-post.md`)
- Include proper front matter in all content files (title, date, draft, tags, categories)
- Write descriptive commit messages

## Content Guidelines
- Blog posts go in `content/posts/`
- Set `draft: false` when ready to publish
- Use appropriate tags and categories
- Include code blocks with language specification for syntax highlighting
- Optimize images before adding to `static/` directory
- Use relative links for internal content

## Development Workflow
1. Clone repository with submodules: `git clone --recurse-submodules`
2. Or initialize submodules: `git submodule update --init --recursive`
3. Run development server: `hugo server -D`
4. Create new posts: `hugo new posts/post-name.md`
5. Edit content in `content/posts/`
6. Test locally at `http://localhost:1313/`
7. Build for production: `hugo --minify`
8. Generated site outputs to `public/` directory (gitignored)

## Theme Configuration
- Theme: PaperMod (https://github.com/adityatelange/hugo-PaperMod)
- Configured in `hugo.toml`
- Features: Dark mode, TOC, code copy buttons, reading time, share buttons
- Customization through `[params]` section in `hugo.toml`

## Deployment
- Platform: Cloudflare Pages
- Build command: `hugo --minify`
- Build output directory: `public`
- Environment variable required: `HUGO_VERSION=0.146.0` (or later)

## Best Practices
- Keep Hugo version specified in documentation
- Test posts locally before committing
- Use Hugo's built-in shortcodes when appropriate
- Maintain consistent front matter across posts
- Keep theme as git submodule (don't modify directly)
- Use `hugo --minify` for production builds
- Ensure all posts have proper metadata (title, date, tags)
- Use descriptive slugs for URLs
- Optimize images and assets before adding them
- Follow the PaperMod theme documentation for advanced features
