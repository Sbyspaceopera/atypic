import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { useEffect } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import "../../scss/header.scss";
import "../../style.css";

export default function Edit({ attributes, setAttributes }) {
  const { logoUrl, siteTitle, menuItems } = attributes;

  useEffect(() => {
    apiFetch({ path: "/atypic/v1/logo" }).then((data) =>
      setAttributes({ logoUrl: data })
    );
  }, []);
  useEffect(() => {
    apiFetch({ path: "/" }).then((data) =>
      setAttributes({ siteTitle: data.name })
    );
  }, []);
  useEffect(() => {
    apiFetch({
      path: "/atypic/v1/menu",
      data: {
        menu_name: "Main Menu",
      },
    })
      .then((data) => setAttributes({ siteTitle: data.name }))
      .catch(setAttributes({ menu: { error: "Please setup the Main Menu" } }));
  }, []);

  return (
    <div {...useBlockProps()}>
      <header className="min-h-[15vh] z-10 top-0 border-solid border-t-0 border-r-0 border-l-0 border-b-4 atypic-header bg-white w-full p-3 sm:p-5 flex items-center justify-between">
        <div className="flex gap-1 flex-wrap justify-center sm:gap-3">
          <div className="w-12 sm:w-20 flex">
            {logoUrl ? <img src={logoUrl} /> : null}
          </div>
          <a
            className="justify-end self-end text-left text-4xl sm:text-6xl text-black underline decoration-dotted decoration-yellow-500"
            href="<?php echo home_url() ?>"
          >
            <h1 className="font-title">{siteTitle}</h1>
          </a>
        </div>

        <div className="skew-x-[-5deg] inline-block group hover:block self-center">
          <span className="bg-black text-yellow-500 dashicons dashicons-menu"></span>
          <nav className="atypic-nav-menu-top right-0">
            <ul>
              {/*
								Call to the menu
								<?php
								wp_nav_menu(array(
									"theme_location" => "main_menu",
									"container" => "nav",
									"container_class" =>"atypic-nav-menu-top right-0",
								));
								?>*/}
            </ul>
          </nav>
        </div>
      </header>
    </div>
  );
}
