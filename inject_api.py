import os

base_dir = r"c:\Users\tomas\Documents\GitHub\Macuin2"
laravel_views = os.path.join(base_dir, "laravel", "resources", "views")
flask_templates = os.path.join(base_dir, "flask", "templates")

for root, _, files in os.walk(laravel_views):
    for str_file in files:
        if str_file.endswith('.php'):
            path = os.path.join(root, str_file)
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()
            if '<script src="/js/api.js"></script>' not in content:
                content = content.replace('</head>', '<script src="/js/api.js"></script>\n</head>')
                with open(path, 'w', encoding='utf-8') as f: f.write(content)

for root, _, files in os.walk(flask_templates):
    for str_file in files:
        if str_file.endswith('.html'):
            path = os.path.join(root, str_file)
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()
            if '<script src="/static/js/api.js"></script>' not in content:
                content = content.replace('</head>', '<script src="/static/js/api.js"></script>\n</head>')
                with open(path, 'w', encoding='utf-8') as f: f.write(content)

print("API script injected.")
