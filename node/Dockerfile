FROM cgr.dev/chainguard/node
ENV NODE_ENV=production

WORKDIR /app

COPY --chown=node:node ["package.json", "package-lock.json", "server.js", "./"]

RUN npm install --omit-dev

CMD [ "server.js" ]

