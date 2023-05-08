FROM cgr.dev/chainguard/ruby:latest-dev as builder

ENV GEM_HOME=/work/vendor
ENV GEM_PATH=${GEM_PATH}:/work/vendor
COPY Gemfile /work/
RUN gem install bundler && bundle install

FROM cgr.dev/chainguard/ruby:latest-dev

ENV GEM_HOME=/work/vendor
ENV GEM_PATH=${GEM_PATH}:/work/vendor

COPY --from=builder /work/* /work/
COPY inky.rb inky.txt debug.rb /work/
RUN echo $GEM_PATH
ENTRYPOINT [ "ruby", "inky.rb" ]