---
name: Heritage Navy & Slate
colors:
  surface: '#fcf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fcf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0edec'
  surface-container-high: '#ebe7e7'
  surface-container-highest: '#e5e2e1'
  on-surface: '#1c1b1b'
  on-surface-variant: '#44474e'
  inverse-surface: '#313030'
  inverse-on-surface: '#f3f0ef'
  outline: '#74777f'
  outline-variant: '#c4c6cf'
  surface-tint: '#465f88'
  primary: '#000a1e'
  on-primary: '#ffffff'
  primary-container: '#002147'
  on-primary-container: '#708ab5'
  inverse-primary: '#aec7f6'
  secondary: '#50606f'
  on-secondary: '#ffffff'
  secondary-container: '#d1e1f4'
  on-secondary-container: '#556474'
  tertiary: '#5c2d91'
  on-tertiary: '#ffffff'
  tertiary-container: '#f0eaf7'
  on-tertiary-container: '#5c2d91'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#d6e3ff'
  primary-fixed-dim: '#aec7f6'
  on-primary-fixed: '#001b3d'
  on-primary-fixed-variant: '#2d476f'
  secondary-fixed: '#d4e4f6'
  secondary-fixed-dim: '#b8c8da'
  on-secondary-fixed: '#0d1d2a'
  on-secondary-fixed-variant: '#394857'
  tertiary-fixed: '#ebdbfa'
  tertiary-fixed-dim: '#c084fc'
  on-tertiary-fixed: '#3b0764'
  on-tertiary-fixed-variant: '#6b21a8'
  background: '#fcf9f8'
  on-background: '#1c1b1b'
  surface-variant: '#e5e2e1'
typography:
  display:
    fontFamily: Plus Jakarta Sans
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 32px
    fontWeight: '700'
    lineHeight: 40px
    letterSpacing: -0.01em
  headline-lg-mobile:
    fontFamily: Plus Jakarta Sans
    fontSize: 24px
    fontWeight: '700'
    lineHeight: 32px
  headline-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  title-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  body-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
    letterSpacing: 0.05em
  label-sm:
    fontFamily: Plus Jakarta Sans
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  unit: 4px
  container-max: 1200px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 48px
  stack-sm: 8px
  stack-md: 16px
  stack-lg: 32px
---

## Brand & Style

The design system is engineered to project a sense of enduring authority, reliability, and outdoor heritage. Built for a scouting troop, the visual language balances the discipline of a traditional organization with the approachability required for youth and families.

The style is **Corporate / Modern** with a focus on high-contrast clarity and structured layouts. It avoids whimsical elements in favor of stable, grounded components that evoke trust. The interface should feel organized and "official," utilizing crisp lines, intentional whitespace, and a sophisticated color palette that moves away from common primary-color scouting tropes toward a more refined, professional aesthetic.

## Colors

The palette is anchored by **Deep Navy**, representing tradition and leadership. This is the primary driver of the visual identity and should be used for key UI anchors like headers, primary buttons, and active states.

- **Primary (Navy Blue):** Used for brand-critical elements and core navigation.
- **Secondary (Slate Gray):** Provides professional depth. Used for secondary actions, iconography, and supporting text.
- **Tertiary (WOSM Purple):** Inspired by the World Organization of the Scout Movement emblem. Used for hover highlights, badge-related accents, or active states.
- **Neutral (Charcoal/Black):** Reserved for high-legibility body text and headers.
- **Surface:** A "Clean White" base is supplemented by "Subtle Light Gray" (#F8FAFC) to create logical divisions between content sections without using heavy borders.

**Constraint:** Do not use light blue or yellow in any UI elements, including warnings or alerts.

## Typography

This design system utilizes **Plus Jakarta Sans** for its clean, geometric, yet friendly personality. It serves as a modern alternative to Poppins, offering better legibility for dense information and a more professional rhythm.

Headlines are bold and tight to convey strength. Body text uses a generous line height (1.5x) to ensure readability for all ages. Labels and small metadata should be set in semi-bold with a slight letter-spacing increase to maintain clarity against dark backgrounds.

## Layout & Spacing

The layout follows a **Fixed Grid** philosophy for desktop to maintain a structured, editorial feel, transitioning to a fluid model for mobile devices.

- **Grid:** A 12-column system is used for desktop (1200px max width).
- **Rhythm:** An 8px base unit (referenced as 2 units of 4px) governs all padding and margins to ensure a tight, mathematical consistency.
- **Mobile:** Margins shrink to 16px. Vertical stacks increase to 32px (stack-lg) between distinct sections to prevent the UI from feeling cramped.
- **Logic:** Use "Surface Subtle" backgrounds to group related content, rather than relying solely on whitespace or lines.

## Elevation & Depth

To maintain a professional and trustworthy aesthetic, this design system uses **Tonal Layers** and **Low-contrast Outlines** rather than heavy shadows.

- **Surfaces:** Depth is communicated by shifting the background color. The base is white, while "container" elements (like cards or sidebars) use the subtle light gray.
- **Borders:** Use 1px solid borders in a very light slate (#E2E8F0) for structural definition.
- **Interactive States:** Only primary buttons and elevated cards may use a subtle, highly-diffused ambient shadow (10% opacity) on hover to indicate interactivity.

## Shapes

The design system employs **Soft** roundedness (0.25rem). This choice balances the "stern" nature of the Navy and Slate colors with a touch of modern friendliness. 

- **Standard Elements:** Buttons and input fields use a 4px (0.25rem) radius.
- **Containers:** Larger components like cards or modals use a 8px (0.5rem) radius.
- **Iconography:** Icons should be stroke-based with slightly rounded ends to match the UI shape language.

## Components

### Buttons
- **Primary:** Solid Navy Blue with White text. 4px corner radius.
- **Secondary:** Outlined Slate Gray with Slate text. 
- **Ghost:** Navy text with no background, used for low-priority actions.

### Input Fields
- White background with a 1px Slate Gray border. 
- Focus state: Border color changes to Navy Blue with a 2px outer glow of Navy at 10% opacity.

### Cards
- White background, 1px light border, 8px corner radius. 
- Headers within cards should use the Subtle Gray background to separate titles from content.

### Chips & Badges
- Used for scout ranks or status. 
- Solid WOSM Purple for "Active" or "Complete" states. 
- Solid Slate Gray for "Pending" or "Draft" states.

### Lists
- Clean, unbordered lists with 16px padding between items. 
- Dividers should be 1px light gray, stopping 16px before the container edge.

### Scouting Specifics
- **Member Directory:** Profile cards should feature a circular avatar with a 2px Navy Blue stroke.
- **Progress Tracker:** Use a thick (8px) horizontal Purple bar for progress, set against a Slate Gray track.