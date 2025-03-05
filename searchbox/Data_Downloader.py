import sys
import numpy as np
import pandas as pd
import yfinance as yf

def download_stock_data(ticker):
    try:
        # Create a Ticker object
        stock = yf.Ticker(ticker)
        
        # Download the stock data with error handling
        df = stock.history(period='max', interval='1d')
        
        if df.empty:
            raise Exception(f"No data found for ticker {ticker}")
        
        # Handle missing Adj Close by using Close price
        if 'Adj Close' not in df.columns and 'Adj Close*' not in df.columns:
            df['Adj Close'] = df['Close']
            print("Note: Using 'Close' price as 'Adj Close' is not available")
        elif 'Adj Close*' in df.columns:
            df = df.rename(columns={'Adj Close*': 'Adj Close'})
            
        # Calculate the moving averages
        df['MA_20'] = df['Close'].rolling(20).mean()
        df['MA_50'] = df['Close'].rolling(50).mean()
        
        # Drop rows with NaN values
        df.dropna(inplace=True)
        
        # Create the crossover signals
        df['SHORT_GR_LONG'] = np.where(df['MA_20'] > df['MA_50'], 1, 0)
        df['Signal'] = df['SHORT_GR_LONG'].diff()
        
        # Generate Buy & Sell signals
        df['Buy & Sell'] = np.where(df['Signal'] < 0, "BUY", "NULL")
        df['Buy & Sell'] = np.where(df['Signal'] > 0, "SELL", df['Buy & Sell'])
        
        # Reset index to include Date column
        df.reset_index(inplace=True)
        
        # Select only the columns we want
        columns = ['Date', 'Open', 'High', 'Low', 'Close', 'Adj Close', 
                  'Volume', 'MA_20', 'MA_50', 'SHORT_GR_LONG', 'Signal', 'Buy & Sell']
        df = df[columns]
        
        # Save to CSV
        output_file = f"{ticker}.csv"
        df.to_csv(output_file, index=False)
        print(f"Successfully downloaded and processed data for {ticker}")
        print(f"Data saved to {output_file}")
        print(f"Data shape: {df.shape}")
        print(f"Date range: {df['Date'].min()} to {df['Date'].max()}")
        
        return df
        
    except Exception as e:
        print(f"Error processing {ticker}: {str(e)}")
        if 'df' in locals():
            print("Available columns:", df.columns.tolist())
        return None

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python script.py TICKER")
        sys.exit(1)
        
    ticker = sys.argv[1].upper()
    df = download_stock_data(ticker)

