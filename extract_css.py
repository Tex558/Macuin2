import os
import re

# Paths
base_dir = r"c:\Users\tomas\Documents\GitHub\Macuin2"
laravel_views_dir = os.path.join(base_dir, "laravel", "resources", "views")
laravel_public_js_dir = os.path.join(base_dir, "laravel", "public", "js")
laravel_public_css_dir = os.path.join(base_dir, "laravel", "public", "css")

flask_templates_dir = os.path.join(base_dir, "flask", "templates")
flask_static_js_dir = os.path.join(base_dir, "flask", "static", "js")
flask_static_css_dir = os.path.join(base_dir, "flask", "static", "css")

os.makedirs(laravel_public_js_dir, exist_ok=True)
os.makedirs(laravel_public_css_dir, exist_ok=True)
os.makedirs(flask_static_js_dir, exist_ok=True)
os.makedirs(flask_static_css_dir, exist_ok=True)

tailwind_config_js = """tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "primary-container": "#3c0006",
        "secondary-container": "#444954",
        "surface-container-low": "#0d1c32",
        "error": "#ffb4ab",
        "on-primary-fixed-variant": "#92001c",
        "inverse-surface": "#d6e3ff",
        "on-secondary-fixed-variant": "#424751",
        "on-error": "#690005",
        "secondary-fixed": "#dee2f0",
        "outline": "#8f9097",
        "on-background": "#d6e3ff",
        "on-tertiary-container": "#9d7b5a",
        "on-surface-variant": "#c5c6cd",
        "on-primary": "#680011",
        "secondary-fixed-dim": "#c2c6d3",
        "surface-bright": "#2c3951",
        "on-surface": "#d6e3ff",
        "surface-container-high": "#1c2a41",
        "on-secondary": "#2c303a",
        "surface-container": "#112036",
        "tertiary-container": "#281400",
        "inverse-primary": "#bb152c",
        "tertiary-fixed-dim": "#e7bf99",
        "on-secondary-container": "#b4b8c5",
        "background": "#041329",
        "surface-container-highest": "#27354c",
        "inverse-on-surface": "#233148",
        "error-container": "#93000a",
        "on-error-container": "#ffdad6",
        "on-tertiary-fixed": "#2b1701",
        "primary-fixed-dim": "#ffb3b1",
        "on-tertiary-fixed-variant": "#5d4124",
        "surface-variant": "#27354c",
        "secondary": "#c2c6d3",
        "surface-container-lowest": "#010e24",
        "primary": "#ffb3b1",
        "surface-dim": "#041329",
        "surface": "#041329",
        "on-tertiary": "#432b10",
        "on-primary-fixed": "#410007",
        "tertiary-fixed": "#ffdcbd",
        "on-primary-container": "#ee3f4b",
        "surface-tint": "#ffb3b1",
        "on-secondary-fixed": "#171c25",
        "primary-fixed": "#ffdad8",
        "outline-variant": "#44474d",
        "tertiary": "#e7bf99"
      },
      fontFamily: {
        "headline": ["Inter"],
        "body": ["Inter"],
        "label": ["Inter"]
      },
      borderRadius: {"DEFAULT": "0rem", "lg": "0rem", "xl": "0rem", "full": "9999px"},
    },
  },
}
"""

css_content = """.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
body {
    font-family: 'Inter', sans-serif;
    background-color: #041329;
    color: #d6e3ff;
}
/* Custom scrollbar for industrial feel */
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: #041329; }
::-webkit-scrollbar-thumb { background: #1c2a41; }
::-webkit-scrollbar-thumb:hover { background: #27354c; }
"""

# Write files
with open(os.path.join(laravel_public_js_dir, "tailwind-config.js"), "w", encoding="utf-8") as f: f.write(tailwind_config_js)
with open(os.path.join(laravel_public_css_dir, "app.css"), "w", encoding="utf-8") as f: f.write(css_content)
with open(os.path.join(flask_static_js_dir, "tailwind-config.js"), "w", encoding="utf-8") as f: f.write(tailwind_config_js)
with open(os.path.join(flask_static_css_dir, "styles.css"), "w", encoding="utf-8") as f: f.write(css_content)

regex_tailwind = re.compile(r'<script id="tailwind-config">.*?</script>', re.DOTALL)
regex_style = re.compile(r'<style>.*?</style>', re.DOTALL)

def process_files(directory, is_laravel):
    for root, _, files in os.walk(directory):
        for file in files:
            if not file.endswith(('.php', '.html')):
                continue
            
            filepath = os.path.join(root, file)
            with open(filepath, "r", encoding="utf-8") as f:
                content = f.read()

            replacement_script = '<script src="/js/tailwind-config.js"></script>' if is_laravel else '<script src="/static/js/tailwind-config.js"></script>'
            replacement_css = '<link href="/css/app.css" rel="stylesheet"/>' if is_laravel else '<link href="/static/css/styles.css" rel="stylesheet"/>'

            new_content = regex_tailwind.sub(replacement_script, content)
            new_content = regex_style.sub(replacement_css, new_content)

            if new_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(new_content)
                print(f"Updated {file}")

process_files(laravel_views_dir, is_laravel=True)
process_files(flask_templates_dir, is_laravel=False)

print("Done.")
