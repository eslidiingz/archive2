export const app = "production";

import local from "./config.local";
import staging from "./config.staging";
import production from "./config.production";

var Config = local;

if (app === "production") {
  Config = production;
} else if (app === "staging") {
  Config = staging;
}

export default Config;
