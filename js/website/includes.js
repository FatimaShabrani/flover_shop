/**
 * Loads HTML fragments marked with [data-include] and replaces each host element.
 * Requires a local HTTP server (fetch does not work reliably with file://).
 */
export async function loadIncludes(root = document) {
  const hosts = [...root.querySelectorAll("[data-include]")];

  await Promise.all(
    hosts.map(async (host) => {
      const url = host.getAttribute("data-include");
      if (!url) return;

      const response = await fetch(url);
      if (!response.ok) {
        throw new Error(`Failed to load ${url}: ${response.status}`);
      }

      host.outerHTML = (await response.text()).trim();
    }),
  );
}
