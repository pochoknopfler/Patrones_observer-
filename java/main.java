
package org.magmax.patterns.observer;


public class Main {
    public static void main(String args[]) throws InterruptedException {
        MyObservable myobservable = new MyObservable();
        MyObserver myobserver = new MyObserver();

        myobservable.addObserver(myobserver);

        Thread thread = new Thread(myobservable);
        thread.start();

        Thread.sleep(2000);
        thread.stop();
        System.out.println("Finishing!");
    }
}
