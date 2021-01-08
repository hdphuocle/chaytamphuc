rm -f .env
cp .env-production .env
git add .
git commit -m "Update content and deploy"
git push origin main
