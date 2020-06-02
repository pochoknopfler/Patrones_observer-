
class Program {
      static void Main(string[] args)
      {
            IObserver observer = new ConsoleObserver();
            ProductService subject = new ProductService();
            subject.Subscribe(observer);
            subject.AddProduct("Solid-state drive");
            Console.WriteLine();
            subject.Unsubscribe(observer);
            subject.AddProduct("Bluetooth mouse");
      }
}