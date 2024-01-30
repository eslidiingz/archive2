import { app } from "../config";

var _token, _launchpad, _locker, _stake;

if (app === "production") {
  _token = require("./production/token.json");
  _launchpad = require("./production/launchpad.json");
  _locker = require("./production/locker.json");
  _stake = require("./production/stake.json");
} else if (app === "staging") {
  _token = require("./staging/token.json");
  _launchpad = require("./staging/launchpad.json");
  _locker = require("./staging/locker.json");
  _stake = require("./staging/stake.json");
} else if (app === "local") {
  _token = require("./local/token.json");
  _launchpad = require("./local/launchpad.json");
  _locker = require("./local/locker.json");
  _stake = require("./local/stake.json");
}

export const abiToken = _token;
export const abiLaunchpad = _launchpad;
export const abiLocker = _locker;
export const abiStake = _stake;
