from pathlib import Path
import csv
import sys

try:
    import pdfplumber
except Exception as e:
    print("pdfplumber não está instalado. Instale com: pip install pdfplumber")
    raise


def find_pdf():
    # project root is two levels up from this file (python/)
    root = Path(__file__).resolve().parents[1]
    pdf_path = root / '../' / 'storage' / 'app' / 'pdf' / 'EMPRESAS_CONVENIADAS.pdf'
    return pdf_path


def write_csv(rows, out_path):
    out_path.parent.mkdir(parents=True, exist_ok=True)
    with out_path.open('w', newline='', encoding='utf-8') as f:
        writer = csv.writer(f)
        for r in rows:
            writer.writerow([cell if cell is not None else '' for cell in r])


def extract_tables_from_pdf(pdf_path: Path):
    rows = []
    with pdfplumber.open(str(pdf_path)) as pdf:
        for page in pdf.pages:
            tables = page.extract_tables()
            if tables:
                for table in tables:
                    for row in table:
                        # normalize row to simple strings
                        rows.append([(cell.strip() if isinstance(cell, str) else (str(cell) if cell is not None else '')) for cell in row])
            else:
                text = page.extract_text()
                if text:
                    for line in text.splitlines():
                        rows.append([line])
    return rows


def main():
    pdf_path = find_pdf()
    if not pdf_path.exists():
        print(f"Arquivo não encontrado: {pdf_path}")
        sys.exit(1)

    print(f"Abrindo {pdf_path}")
    rows = extract_tables_from_pdf(pdf_path)
    if not rows:
        print("Nenhuma tabela/texto extraído do PDF.")
        sys.exit(1)

    out_csv = pdf_path.with_suffix('.csv')
    write_csv(rows, out_csv)
    print(f"Extração concluída. CSV salvo em: {out_csv}")


if __name__ == '__main__':
    main()


