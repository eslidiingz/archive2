require("dotenv").config();
const FormData = require("form-data");
const fs = require("fs");
const fetch = require("node-fetch");
const secret = process.env;
const assetEndpoint = "assets";
const assetUrl = `${secret.collectionApiEndpoint}/${assetEndpoint}`;

const collectionEndpoint = "collections";
const collectionUri = `${secret.collectionApiEndpoint}/${collectionEndpoint}`;

module.exports = {
  async readFile(file) {
    const _file = await fs.readFileSync(file);
    return _file;
  },

  async importMetadata(file, metadata) {
    const fd = new FormData();
    fd.append("file", fs.createReadStream(file));
    fd.append("metadata", JSON.stringify(metadata));

    const _result = await fetch(`${secret.cdnApiEndpoint}/upload_json`, {
      method: "post",
      body: fd,
    });

    return await _result.json();
  },

  async fetchMetadata(url) {
    const _result = await fetch(url);

    return await _result.json();
  },

  async createAssetList(data) {
    const _result = await fetch(`${assetUrl}`, {
      method: "post",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });
    return await _result;
  },

  async fetchAssetCollection(collection) {
    const find = await fetch(`${collectionUri}/${collection}`);
    return await find.json();
  },

  async putAssetCollection(id, data) {
    const json = await fetch(`${collectionUri}/${id}`, {
      method: "put",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });
    return await json;
  },
  async putHolderCollection(id, data) {
    const json = await fetch(`${collectionUri}/holder/${id}`, {
      method: "put",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });
    return await json;
  },
};
