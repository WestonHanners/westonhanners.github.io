FROM jekyll/jekyll:latest

COPY . /srv/jekyll

CMD ["jekyll", "serve", "--drafts", "--verbose"]