import type { Metadata } from "next";
import "./globals.css";
import Header from "@/components/layout/Header";
import Footer from "@/components/layout/Footer";

export const metadata: Metadata = {
  title: "NoticiasInvestiga - Periodismo de Investigación",
  description: "Portal de noticias de investigación sobre proyectos de desarrollo regional, Chavimochic y avances en infraestructura, agricultura y tecnología en La Libertad, Perú.",
  keywords: "noticias, investigación, chavimochic, la libertad, peru, agricultura, infraestructura",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="es">
      <body className="font-sans antialiased bg-gray-50">
        <Header />
        <main className="min-h-screen">
          {children}
        </main>
        <Footer />
      </body>
    </html>
  );
}
