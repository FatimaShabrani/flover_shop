const BOUQUET_IMAGE =
  "../../images/bouquets/Gemini_Generated_Image_6w7cub6w7cub6w7c-removebg-preview.png";

export const products = Array.from({ length: 9 }, (_, index) => ({
  id: `velvet-rose-${index + 1}`,
  name: "Velvet Rose",
  stems: 24,
  shortDescription: "Classic elegance in a deep red hue",
  description:
    "A considered arrangement of selected red roses, quiet greenery and luxurious ivory...",
  price: 185,
  currency: "JOD",
  imageSrc: BOUQUET_IMAGE,
  imageAlt: "Velvet Rose bouquet",
  detailsHref: "#",
}));
