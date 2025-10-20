# tommos.co.uk

Personal blog built with Hugo - a fast and modern static site generator.

## About

This is my personal blog where I share thoughts on technology, coding projects, and development tutorials. The site is built with [Hugo](https://gohugo.io/) using the PaperMod theme and deployed on Cloudflare Pages.

## Local Development

### Prerequisites

- Hugo Extended v0.146.0 or later (required for PaperMod theme)

### Installation

**macOS:**
```bash
brew install hugo
```

**Linux:**
```bash
# Download and install Hugo Extended
wget https://github.com/gohugoio/hugo/releases/download/v0.146.0/hugo_extended_0.146.0_linux-amd64.tar.gz
tar -xzf hugo_extended_0.146.0_linux-amd64.tar.gz
sudo mv hugo /usr/local/bin/
```

**Windows:**
```bash
# Using Chocolatey
choco install hugo-extended
```

### Getting Started

1. **Clone the repository with submodules:**
```bash
git clone --recurse-submodules https://github.com/tommos23/tommos.git
cd tommos
```

2. **Or if already cloned, initialize submodules:**
```bash
git submodule update --init --recursive
```

3. **Run the development server:**
```bash
hugo server -D
```

The site will be available at `http://localhost:1313/`

4. **Build for production:**
```bash
hugo --minify
```

The built site will be in the `public/` directory.

### Creating New Posts

To create a new blog post:

```bash
hugo new posts/my-new-post.md
```

This will create a new post in `content/posts/` with the default template. Edit the file, set `draft: false` when ready to publish.

## Deployment

### Cloudflare Pages

This site is configured for deployment on Cloudflare Pages.

**Build settings:**
- **Build command:** `hugo --minify`
- **Build output directory:** `public`
- **Environment variables:**
  - `HUGO_VERSION`: `0.146.0` (or later)

### Manual Deployment

After building with `hugo --minify`, the contents of the `public/` directory can be deployed to any static hosting service.

## Project Structure

```
tommos/
├── archetypes/       # Content templates
├── content/          # Blog posts and pages
│   ├── _index.md    # Homepage content
│   └── posts/       # Blog posts directory
├── static/          # Static assets (favicons, images, etc.)
├── themes/          # Hugo themes (PaperMod)
├── hugo.toml        # Site configuration
└── public/          # Generated site (not committed)
```

## Theme

This site uses the [PaperMod](https://github.com/adityatelange/hugo-PaperMod) theme, which offers:
- Fast performance
- Dark mode support
- SEO friendly
- Mobile responsive
- Code syntax highlighting

## License

Content is © tommos.co.uk 2025. Theme is licensed under MIT.
