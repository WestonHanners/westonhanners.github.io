FROM jekyll/jekyll:latest
CMD ["jekyll", "serve", "--drafts", "--verbose", "--watch"]