import type { SVGAttributes } from 'react';

export default function AppLogoIcon(props: SVGAttributes<SVGElement>) {
  return (
    <svg
      {...props}
      viewBox="0 0 200 200"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <rect width="200" height="200" rx="40" fill="#111111" />

      <path
        d="M50 70L75 55V145L50 130V70Z"
        stroke="white"
        stroke-width="8"
        stroke-linejoin="round"
      />
      <path
        d="M75 100L100 85L125 100L100 115L75 100Z"
        stroke="white"
        stroke-width="8"
        stroke-linejoin="round"
      />
      <path
        d="M100 85V55L150 85V105L125 90V120L150 135"
        stroke="white"
        stroke-width="8"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  );
}
