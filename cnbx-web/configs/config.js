export const app = "local"; // local | staging | production
export const debug = true;

import ConfigLocal from "./config.local";
import ConfigStaging from "./config.staging";
import ConfigProduction from "./config.production";

let Config;

switch (app) {
	case "local": Config = ConfigLocal; break;
	case "staging": Config = ConfigStaging; break;
	case "production": Config = ConfigProduction; break;
	default: Config = ConfigLocal;
}

if (debug) console.log(`%c=== CONFIG : %c${app.toUpperCase()} ===`, `color: lime`, `color: orange`, Config);

export default Config;
