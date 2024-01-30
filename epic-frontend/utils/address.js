export function getWalletAddress(wallet_address) {
  let prefix = wallet_address;
  let subfix = wallet_address;

  prefix = prefix.slice(0, 6);
  subfix = subfix.slice(subfix.length - 4);

  return prefix + "..." + subfix;
}
