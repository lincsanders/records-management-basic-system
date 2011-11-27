//
//  CEGVisitViewController.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <UIKit/UIKit.h>

@class DetailViewController;

@interface CEGVisitViewController : UITableViewController
{
    NSManagedObject* _apprenticeManagedObject;
    
    NSFetchedResultsController* _visitFetchedResultsController;
    
    DetailViewController* _detailViewController;
}

@property (nonatomic,retain) NSManagedObject* apprenticeManagedObject;
@property (nonatomic,retain) NSFetchedResultsController* visitFetchedResultsController;
@property (retain, nonatomic) DetailViewController *detailViewController;

@end
