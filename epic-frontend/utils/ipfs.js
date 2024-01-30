const IPFS = require("ipfs-api");
const ipfs = new IPFS({ host: "gateway.pinata.cloud", protocol: "https" });

export default ipfs;
