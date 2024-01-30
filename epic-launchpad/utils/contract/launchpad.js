import { Contract } from "ethers";

import { connectProvider } from "../connector/provider";
import Config from "../../config";
import { abiLaunchpad } from "../../abis";
import { formatUnits, parseUnits } from "ethers/lib/utils";

export async function getRateLaunchpad() {
  const web3Provider = connectProvider();

  const contract = new Contract(
    Config.LAUNCHPAD_ADDR,
    abiLaunchpad,
    web3Provider
  );

  const tokenRate = await contract.getTokenRate(Config.BUSD_ADDR);
  const decimal = await formatUnits(await contract.decimal(), "wei");

  const rate = tokenRate.rate / decimal;

  return rate;
}

export async function buyLaunchpad(amount, type) {
  const web3Provider = connectProvider();
  const signer = web3Provider.getSigner();

  const contract = new Contract(Config.LAUNCHPAD_ADDR, abiLaunchpad, signer);

  const tx = await contract.buy(
    parseUnits(amount.toString()),
    Config.BUSD_ADDR,
    type
  );
  const status = await tx.wait();
  return status;
}

export async function sellLaunchpad(amount) {
  const web3Provider = connectProvider();
  const signer = web3Provider.getSigner();

  const contract = new Contract(Config.LAUNCHPAD_ADDR, abiLaunchpad, signer);
  const tx = await contract.sell(parseUnits(amount), Config.BUSD_ADDR);
  const status = await tx.wait();
  return status;
}
