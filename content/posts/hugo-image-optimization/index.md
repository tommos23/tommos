---
title: "Improve Your Hugo Site with Automatic Image Optimization"
date: 2025-11-16
draft: false
description: "Learn how Hugo's built-in image processing can automatically generate responsive images with WebP support for faster page loads and better user experience"
tags: ["hugo", "web-performance", "image-optimization", "webp", "responsive-design"]
categories: ["development", "web"]
ShowToc: true
TocOpen: false
---

Images are often the largest assets on a web page, significantly impacting load times and user experience. While many developers resort to manual image optimisation or third-party services, Hugo has powerful built-in image processing that can automatically generate multiple sizes and formats at build time.

In this post, I'll show you how to leverage Hugo's Page Bundles and image processing to create a responsive image shortcode that generates WebP versions, multiple sizes, and implements lazy loading—all with zero runtime overhead.

## The Problem with Static Images

Traditional approaches to images have several issues:

- **Single size serves all devices** - Mobile users download desktop-sized images
- **No format optimisation** - Missing out on modern formats like WebP (often 30% smaller than JPEG)
- **Manual processing** - Time-consuming to create multiple versions
- **Performance impact** - Large images slow down page loads, especially on mobile networks

## Hugo's Solution: Page Bundles + Image Processing

Hugo's Page Bundle structure allows you to co-locate images with your content, and its image processing API can generate optimized versions automatically during the build.

### Step 1: Convert to Page Bundles

Instead of storing posts as single markdown files, use the Page Bundle structure:

```
content/posts/
  my-post/
    index.md        # Your content
    image1.jpg      # Images stored with the post
    image2.jpg
```

This makes images available as Page Resources that Hugo can process.

### Step 2: Create a Responsive Image Shortcode

Create `layouts/shortcodes/img.html`:

```html
{{- $img := .Page.Resources.GetMatch (.Get "src") -}}
{{- $alt := .Get "alt" | default "" -}}
{{- $caption := .Get "caption" | default "" -}}

{{- if $img -}}
  {{- $tinyw := $img.Fill "320x320 webp" -}}
  {{- $smallw := $img.Fill "640x640 webp" -}}
  {{- $mediumw := $img.Fill "1024x1024 webp" -}}
  {{- $largew := $img.Fill "1600x1600 webp" -}}
  
  {{- $tiny := $img.Fill "320x320" -}}
  {{- $small := $img.Fill "640x640" -}}
  {{- $medium := $img.Fill "1024x1024" -}}
  {{- $large := $img.Fill "1600x1600" -}}

  <figure>
    <picture>
      <source type="image/webp"
              srcset="{{ $tinyw.RelPermalink }} 320w,
                      {{ $smallw.RelPermalink }} 640w,
                      {{ $mediumw.RelPermalink }} 1024w,
                      {{ $largew.RelPermalink }} 1600w"
              sizes="(max-width: 640px) 100vw, (max-width: 1024px) 90vw, 1024px">
      <source type="{{ $img.MediaType }}"
              srcset="{{ $tiny.RelPermalink }} 320w,
                      {{ $small.RelPermalink }} 640w,
                      {{ $medium.RelPermalink }} 1024w,
                      {{ $large.RelPermalink }} 1600w"
              sizes="(max-width: 640px) 100vw, (max-width: 1024px) 90vw, 1024px">
      <img src="{{ $medium.RelPermalink }}" 
           alt="{{ $alt }}"
           width="{{ $medium.Width }}"
           height="{{ $medium.Height }}"
           loading="lazy"
           decoding="async"
           style="width: 100%; height: auto; max-width: {{ $medium.Width }}px;">
    </picture>
    {{- if $caption -}}
      <figcaption>{{ $caption | markdownify }}</figcaption>
    {{- end -}}
  </figure>
{{- else -}}
  <p style="color: red;">Error: Image "{{ .Get "src" }}" not found in page bundle</p>
{{- end -}}
```

### Step 3: Use the Shortcode in Your Content

In your markdown files:

```markdown
{{</* img src="photo.jpg" alt="A beautiful landscape" */>}}

{{</* img src="diagram.png" alt="Architecture diagram" caption="System overview" */>}}
```

## What Happens at Build Time

When you run `hugo`, the shortcode:

1. **Finds the image** in your page bundle
2. **Generates 8 versions** - 4 WebP + 4 original format at different sizes
3. **Creates responsive markup** with `srcset` and `sizes` attributes
4. **Outputs optimized HTML** with lazy loading and async decoding

From a single source image, Hugo automatically creates:
- `image-320x320.webp` (mobile)
- `image-640x640.webp` (large phones)
- `image-1024x1024.webp` (tablets)
- `image-1600x1600.webp` (desktops)
- Plus 4 fallback versions in the original format

## Performance Benefits

This approach delivers significant improvements:

- **30-50% smaller file sizes** with WebP format
- **Faster mobile loads** by serving appropriately sized images
- **Better Core Web Vitals** scores (LCP, CLS)
- **Reduced bandwidth costs** for both you and your users
- **Zero runtime overhead** - all processing happens at build time

## Image Processing Methods

Hugo offers three main methods:

- **`.Resize "WIDTHx"`** - Scales to width, maintains aspect ratio
- **`.Fit "WIDTHxHEIGHT"`** - Scales to fit within dimensions
- **`.Fill "WIDTHxHEIGHT"`** - Crops and scales to exact dimensions (used above for square images)

You can customize the shortcode based on your needs. For example, to maintain original aspect ratios instead of forcing square crops, change `.Fill` to `.Resize`.

## Additional Optimisations

You can enhance this further:

```html
{{- $tinyw := $img.Resize "320x webp q75" -}}
```

Add quality parameters (`q75`), filters, or even convert to different formats automatically.

## Conclusion

Hugo's image processing is a game-changer for static sites. By implementing Page Bundles and a responsive image shortcode, you get:

- Automatic multi-format, multi-size image generation
- Modern WebP support with fallbacks
- Lazy loading and performance optimisations
- Better organisation with co-located content and images
- All processed at build time with zero runtime cost

The best part? This all happens during your static site build—no complex server infrastructure, no CDN dependencies, and no JavaScript required. Your users get the optimal image for their device and browser automatically.

If you're using Hugo and haven't explored its image processing capabilities yet, this is one of the most impactful optimisations you can implement for your site's performance.
