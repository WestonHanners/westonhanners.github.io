FROM jekyll/jekyll:latest

COPY . /srv/jekyll

RUN ["jekyll", "build", "--drafts", "--verbose"]

CMD ["jekyll", "serve", "--drafts", "--verbose", "--watch"]
